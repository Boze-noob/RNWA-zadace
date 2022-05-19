const getAllPostsBtn = document.getElementById('get_all_posts_btn');
const getAllInterestsBtn = document.getElementById('get_all_interests_btn');

const getAllPosts = () => {
  axios.get('http://localhost:5000/api/posts').then(response => {
    console.log('This response is in client side ');  
  console.log(response);
  });
};

const getAllInterests = () => {
    axios.get('http://localhost:5000/api/interests').then(response => {
    console.log('This response is in client side ');
      console.log(response);
    });
  };

getAllPostsBtn.addEventListener('click', getAllPosts);
getAllInterestsBtn.addEventListener('click', getAllInterests);