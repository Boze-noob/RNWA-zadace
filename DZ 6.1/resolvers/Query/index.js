const { GraphQLObjectType } = require('graphql');

const fieldsUser = require('./user');
const fieldsUsers = require('./users');
const fieldsPosts = require('./posts');
const fieldsRegistration = require('./registration');
const fieldsRegistrations = require('./registrations');
const fieldsMyPosts = require('./myPosts');

const Query = new GraphQLObjectType({
  name: 'Query',
  fields: {
    // Query one user
    user: fieldsUser,
    // Query all users
    users: fieldsUsers,
    // Query all posts
    posts: fieldsPosts,
    registration: fieldsRegistration,
    registrations: fieldsRegistrations,
    myposts: fieldsMyPosts,
  }
});

module.exports = Query;