const { GraphQLList } = require('graphql');
const { dbQuery } = require('../../database');
const { RegistrationType } = require('../../types');

const fieldsRegistrations = {
  type: new GraphQLList(RegistrationType),
  async resolve(_, {}){
    let res = await dbQuery(`SELECT * FROM registration`);
    return res;
  }
};

module.exports = fieldsRegistrations;
