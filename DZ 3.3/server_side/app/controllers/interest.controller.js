const Interest = require("../models/interest.model.js");

// Create and Save a new Interest
exports.create = (req, res) => {
  // Validate request
  if (!req.body) {
    res.status(400).send({
      message: "Content can not be empty!"
    });
  }

  // Create a Interest
  const interest = new Interest({
    interest: req.body.interest,
    rid: req.body.rid,
  });

  // Save Interest in the database
  Interest.create(interest, (err, data) => {
    if (err)
      res.status(500).send({
        message:
          err.message || "Some error occurred while creating the Interest."
      });
    else res.send(data);
  });
};

// Retrieve all Interests from the database (with condition).
exports.findAll = (req, res) => {
  const title = ' ';
  Interest.getAll(title, (err, data) => {
    if (err)
      res.status(500).send({
        message:
          err.message || "Some error occurred while retrieving Interest."
      });
    else res.send(data);
  });
};

// Find a single Interest by Id
exports.findOne = (req, res) => {
  Interest.findById(req.params.id, (err, data) => {
    if (err) {
      if (err.kind === "not_found") {
        res.status(404).send({
          message: `Not found Interest with id ${req.params.intid}.`
        });
      } else {
        res.status(500).send({
          message: "Error retrieving Interest with id " + req.params.intid
        });
      }
    } else res.send(data);
  });
};

// Update a Interest identified by the id in the request
exports.update = (req, res) => {
  // Validate Request
  if (!req.body) {
    res.status(400).send({
      message: "Content can not be empty!"
    });
  }

  console.log(req.body);

  Interest.updateById(
    req.params.id,
    new Interest(req.body),
    (err, data) => {
      if (err) {
        if (err.kind === "not_found") {
          res.status(404).send({
            message: `Not found Interest with id ${req.params.intid}.`
          });
        } else {
          res.status(500).send({
            message: "Error updating Interest with id " + req.params.intid
          });
        }
      } else res.send(data);
    }
  );
};

// Delete a Interest with the specified id in the request
exports.delete = (req, res) => {
  Interest.remove(req.params.id, (err, data) => {
    if (err) {
      if (err.kind === "not_found") {
        res.status(404).send({
          message: `Not found Interest with id ${req.params.id}.`
        });
      } else {
        res.status(500).send({
          message: "Could not delete Interest with id " + req.params.id
        });
      }
    } else res.send({ message: `Interest was deleted successfully!` });
  });
};

// Delete all Interests from the database.
exports.deleteAll = (req, res) => {
  Interest.removeAll((err, data) => {
    if (err)
      res.status(500).send({
        message:
          err.message || "Some error occurred while removing all Interests."
      });
    else res.send({ message: `All Interest were deleted successfully!` });
  });
};
