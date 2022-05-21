const getAllPosts = () => {
  axios.get('http://localhost:5000/api/posts').then(response => {
  var dataArray = response.data;
  var table = document.getElementById('postsTable');
  var colDesc = document.createElement('tr');
  colDesc.innerHTML = '<tr><th>pid</th><th>sadrzaj</th><th>rid</th><th>vrijeme</th><th>opcije</th></tr>';
  table.appendChild(colDesc);

  dataArray.forEach(function(object) {
    var tr = document.createElement('tr');
    tr.innerHTML = '<td>' + object.pid + '</td>' +
    '<td>' + object.pcontent + '</td>' +
    '<td>' + object.rid + '</td>' +
    '<td>' + object.time + '</td>' +
    `<a onClick="onEdit(this)"> Uredi </a>
                       <a onClick="onDelete(this)"> Izbrisi </a>`;
    table.appendChild(tr);
});          
  }) .catch(function (error) {
    console.log(error);
  });
};

const getAllInterests = () => {
    axios.get('http://localhost:5000/api/interests').then(response => {
      var dataArray = response.data;
      var table = document.getElementById('interestsTable');
      var colDesc = document.createElement('tr');
      colDesc.innerHTML = '<tr><th>intid</th><th>interes</th><th>rid</th><th>opcije</th></tr>';
      table.appendChild(colDesc);
    
      dataArray.forEach(function(object) {
        var tr = document.createElement('tr');
        tr.innerHTML = '<td>' + object.intid + '</td>' +
        '<td>' + object.interest + '</td>' +
        '<td>' + object.rid + '</td>' +
        `<a onClick="onEdit(this)"> Uredi </a>
                           <a onClick="onDelete(this)"> Izbrisi </a>`;
        table.appendChild(tr);
    }); 
    
    }).catch(function (error) {
      console.log(error);
    });
  };


  const addPostBtn = document.getElementById('add_post_btn');

const postPost = () => {
  var pcontent = document.getElementById('create_post_content').value;
  var rid = document.getElementById('create_post_rid').value;

  const headers = {
    'Content-Type': 'application/json'
};
var currentdate = new Date(); 
    axios.post('http://localhost:5000/api/post', {
    pcontent : pcontent,
    rid : rid,
    time : currentdate,
    },
    {headers}
    ).then(
      function(response){
        console.log('action response');
        console.log(response);
      }
    ).catch(function(error){
      console.log(error);
    });
  }

  addPostBtn.addEventListener('click', postPost);
