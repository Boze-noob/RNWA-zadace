const { GraphQLString } = require('graphql');
const { dbQuery } = require('../../database');
const { RegistrationType } = require('../../types');

const insertRegistration = {
  type: RegistrationType,
  args: {
    dob: {type: GraphQLString},
    fname: {type: GraphQLString},
    lname: {type: GraphQLString},
    gender: {type: GraphQLString},
  },
  async resolve(_, { dob, fname, lname, gender }){
    let res = await dbQuery(`insert into registration (dob, fname, lname, gender) values ('${dob}', '${fname}', '${lname}', '${gender}')`);
    return { id: res.insertId, dob, fname, lname, gender}
  }
};

module.exports = insertRegistration;