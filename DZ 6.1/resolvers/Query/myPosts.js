const { GraphQLList } = require('graphql');
const { dbQuery } = require('../../database');
const { MyPostType } = require('../../types');

const fieldsMyPosts = {
  type: new GraphQLList(MyPostType),
  async resolve(_, {}){
    let res = await dbQuery(`SELECT * FROM post`);
    return res;
  }
};

module.exports = fieldsMyPosts;
