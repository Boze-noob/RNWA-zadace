
const headers = {
  'Content-Type': 'application/json'
};

const getAllPosts = () => {
  axios.get('http://localhost:5000/api/posts').then(response => {
  var dataArray = response.data;
  var table = document.getElementById('postsTable');
  var colDesc = document.createElement('tr');
  colDesc.innerHTML = '<tr><th>pid</th><th>sadrzaj</th><th>rid</th><th>vrijeme</th><th>opcije</th></tr>';
  table.appendChild(colDesc);

  dataArray.forEach(function(object) {
    var tr = addNewRowPostTable(object);
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
        var tr = addNewRowInterestTable(object);
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
  var table = document.getElementById('postsTable');

  const headers = {
    'Content-Type': 'application/json'
};
var currentdate = new Date().toISOString().slice(0, 19).replace('T', ' '); 

var post = {
  pcontent : pcontent,
  rid: rid,
  time: currentdate,
}
    axios.post('http://localhost:5000/api/post', post,
    {headers}
    ).then(
      function(response){
        var tr = addNewRowPostTable(response.data.newPost);
        table.appendChild(tr);
        console.log(response);
      }
    ).catch(function(error){
      console.log(error);
    });
  }

  function addNewRowInterestTable(object){
    var tr = document.createElement('tr');
    tr.innerHTML = '<td>' + object.intid + '</td>' +
    '<td contenteditable="true">' + object.interest + '</td>' +
    '<td contenteditable="true">' + object.rid + '</td>' +
    `<a onClick="onInterestEdit(this)"> Izmjeni </a>
                       <a onClick="onDeleteInterest(this)"> Izbrisi </a>`;
    return tr;
  }

  function addNewRowPostTable(object){
    var tr = document.createElement('tr');
    tr.innerHTML = '<td>' + object.pid + '</td>' +
    '<td contenteditable="true">' + object.pcontent + '</td>' +
    '<td contenteditable="true">' + object.rid + '</td>' +
    '<td contenteditable="true">' + object.time + '</td>' +
    `<a onClick="onPostEdit(this)"> Izmjeni </a>
                       <a onClick="onDeletePost(this)"> Izbrisi </a>`;
                       return tr;
  }

  function onDeletePost(td){
    selectedRow = td.parentElement;
    var pid = selectedRow.cells[0].innerHTML;

    axios.delete('http://localhost:5000/api/post/' + pid,
    {headers}
    ).then(
      function(response){
        document.getElementById("postsTable").deleteRow(selectedRow.rowIndex);
        resetForm();
      }
    ).catch(function(error){
      console.log(error);
    });
  }

  function onPostEdit(td){
    console.log('on post edit');
    selectedRow = td.parentElement;
    var pid = selectedRow.cells[0].innerHTML;
    
    var post = {
      pcontent : selectedRow.cells[1].innerHTML,
      rid: selectedRow.cells[2].innerHTML,
      time: new Date().toISOString().slice(0, 19).replace('T', ' '),
    }

    axios.put('http://localhost:5000/api/post/' + pid, post,
    {headers}
    ).then(
      function(response){
        console.log(response);
      }
    ).catch(function(error){
console.log(error);
    });
  }

  addPostBtn.addEventListener('click', postPost);
