const sql = require("./db.js");

// constructor
const Interest = function(interest) {
  this.interest = interest.interest;
  this.rid = interest.rid;
};

Interest.create = (newInterest, result) => {
  sql.query("INSERT INTO interest SET ?", newInterest, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    console.log("created interest: ", {newInterest });
    result(null, {newInterest });
  });
};

Interest.findById = (intid, result) => {
  sql.query(`SELECT * FROM interest WHERE intid = ${intid}`, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    if (res.length) {
      console.log("found Interest: ", res[0]);
      result(null, res[0]);
      return;
    }

    // not found Tutorial with the id
    result({ kind: "not_found" }, null);
  });
};

Interest.getAll = (intid, result) => {
  console.log("we are in Interest model");
  let query = "SELECT * FROM interest";

  sql.query(query, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log("Interests: ", res);
    result(null, res);
  });
};

Interest.updateById = (intid, Interest, result) => {
  sql.query(
    "UPDATE interest SET interest = ?, rid = ? WHERE intid = ?",
    [Interest.interest, Interest.rid, intid],
    (err, res) => {
      if (err) {
        console.log("error: ", err);
        result(null, err);
        return;
      }

      if (res.affectedRows == 0) {
        // not found Tutorial with the id
        result({ kind: "not_found" }, null);
        return;
      }

      console.log("updated Interest: ", { id: intid, ...Interest });
      result(null, { id: intid, ...Interest });
    }
  );
};

Interest.remove = (intid, result) => {
  sql.query("DELETE FROM interest WHERE intid = ?", intid, (err, res) => {
    if (err) {
      result(null, err);
      return;
    }

    if (res.affectedRows == 0) {
      // not found Tutorial with the id
      result({ kind: "not_found" }, null);
      return;
    }

    console.log("deleted tutorial with intid: ", intid);
    result(null, res);
  });
};

Interest.removeAll = result => {
  sql.query("DELETE FROM interest", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log(`deleted ${res.affectedRows} interest`);
    result(null, res);
  });
};

module.exports = Interest;
