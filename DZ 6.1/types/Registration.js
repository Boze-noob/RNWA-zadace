const { GraphQLObjectType, GraphQLInt, GraphQLString, GraphQLList } = require('graphql');

const RegistrationType = new GraphQLObjectType({
    name: 'Registration',
    fields:() =>(
        {
            rid: { type: GraphQLInt},
            dob: {type: GraphQLString},
            fname: {type: GraphQLString},
            lname: {type: GraphQLString},
            gender: {type: GraphQLString},
        }
    )
  });
  
  module.exports = RegistrationType;