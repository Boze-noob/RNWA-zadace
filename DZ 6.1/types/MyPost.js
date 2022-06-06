const { GraphQLObjectType, GraphQLInt, GraphQLString, GraphQLList } = require('graphql');
const { dbQuery } = require('../database');
const RegistrationType = require('./Registration.js');
//This is part of our project...Post type is part of other database
const MyPostType = new GraphQLObjectType({
  name: 'MyPost',
  fields:() => (
    {
        pid: {type: GraphQLInt},
        pcontent: {type: GraphQLString},
        rid: {type: GraphQLInt},
        time: {type: GraphQLString},
      registration: { 
        type: RegistrationType,
        resolve: async (post) => {
          let res = await dbQuery(`SELECT * FROM registration WHERE rid = ${parseInt(post.rid)}`);
          return res[0];
        }
      }
    }
  ) 
});

module.exports = MyPostType;