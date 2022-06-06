const { GraphQLObjectType } = require('graphql');
const insertUser = require('./insertUser');
const insertRegistration = require('./insertRegistration');

const Mutation = new GraphQLObjectType({
  name: 'mutation',
  fields: {
    // Insert a new user record
    insertUser: insertUser,
    insertRegistration: insertRegistration
  }
});

module.exports = Mutation;
