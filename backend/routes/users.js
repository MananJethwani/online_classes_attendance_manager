const bcrypt = require("bcrypt");
const _ = require("lodash");
const express = require("express");
const jwt = require("jsonwebtoken");
const config = require("config");
const router = express.Router();
const mysql = require('mysql');


function generateAuthToken(req) {
    const token = jwt.sign(
      {
        name: req.body.name,
        email: req.body.email,
      },
      config.get("jwtPrivateKey")
    );
    return token;
};

router.post("/", async (req, res) => {
    let result;
    var con = mysql.createConnection({
      host: "localhost",
      user: "root",
      password: ""
    });
    con.connect(function(err) {
        con.query("use dbms", (err, res) => {console.log(res)});
        result = con.query(`select name from users where email=${req.body.email}`, function (err, res) {console.log(res);return res;});
      });
    if (result) return res.status(400).send("User already registered.");
  
    const salt = await bcrypt.genSalt(10);
    req.body.password = await bcrypt.hash(req.body.password, salt);
    const token = generateAuthToken(req);
    con.connect(function(err) {
        con.query(`INSERT INTO users VALUES (${req.body.email},${req.body.name},${req.body.password})`, function (err, res) {console.log(res)});
    });
    console.log("sending");
    res
      .status(200)
      .header("x-auth-token", token)
      .header("access-control-expose-headers", "x-auth-token").send(req.body.email);
});
module.exports = router;