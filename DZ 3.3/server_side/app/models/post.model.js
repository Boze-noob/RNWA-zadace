const sql = require("./db.js");

// constructor
const Post = function(post) {
  this.pcontent = post.pcontent;
  this.rid = post.rid;
  this.time = post.time;
};

Post.create = (newPost, result) => {
  sql.query("INSERT INTO post SET ?", newPost, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    console.log("created post: ", {newPost });
    result(null, {newPost });
  });
};

Post.findById = (pid, result) => {
  sql.query(`SELECT * FROM post WHERE pid = ${pid}`, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    if (res.length) {
      console.log("found post: ", res[0]);
      result(null, res[0]);
      return;
    }

    // not found Tutorial with the id
    result({ kind: "not_found" }, null);
  });
};

Post.getAll = (pid, result) => {
  console.log("we are in post model");
  let query = "SELECT * FROM post";

  sql.query(query, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log("posts: ", res);
    result(null, res);
  });
};

Post.updateById = (pid, post, result) => {
  sql.query(
    "UPDATE post SET pcontent = ?, rid = ?, description = ? WHERE pid = ?",
    [post.pcontent, post.rid, post.time, pid],
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

      console.log("updated post: ", { id: pid, ...post });
      result(null, { id: pid, ...post });
    }
  );
};

Post.remove = (pid, result) => {
  sql.query("DELETE FROM post WHERE pid = ?", pid, (err, res) => {
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

    console.log("deleted tutorial with pid: ", pid);
    result(null, res);
  });
};

Post.removeAll = result => {
  sql.query("DELETE FROM post", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log(`deleted ${res.affectedRows} posts`);
    result(null, res);
  });
};

module.exports = Post;
