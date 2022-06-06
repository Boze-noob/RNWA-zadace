const { GraphQLInt, GraphQLString, GraphQLList } = require('graphql');
const { dbQuery } = require('../../database');
const { RegistrationType } = require('../../types');

const fieldsRegistration = {
  type: RegistrationType,
  args: {
    id: { type: GraphQLInt }
  },
  async resolve(_, { id }){
    let res = await dbQuery(`SELECT * FROM registration WHERE rid = ${id}`);
    return res[0];
  }
};

module.exports = fieldsRegistration;
