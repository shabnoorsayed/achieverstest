<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Hello, world!</title>
    <style>
        img {
            height: 150px;
            width:150px;
        }
    </style>
  </head>
  <body>
      <h1><?php echo "Hello World";?></h1>
      <!-- Search form -->
      <form class="form-inline ml-2 mb-3 active-4 ">
        <input id="searchBar" class="form-control form-control-sm mr-3 w-30" type="text" placeholder="Search" aria-label="Search">
        <button id="searchBtn" class="btn btn-primary" type=button>Search</button>
     </form>

     <table class="table table-striped" style="width:80%">
         <thead>
            <tr>
                <th>Poster</th> 
                <th>Title</th> 
                <th>Release Date</th>
                <th>Ratings</th>
            </tr>
        </thead>
        <tbody id="moviesList">
        </tbody>
        
    </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<script>
$('#searchBtn').click(function(){
    var keyword = $('#searchBar').val();
    var api_key = "2dbad3723bef33dabede1791bb3c3f4c";
$.ajax({
    url:"https://api.themoviedb.org/3/search/movie?api_key="+ api_key +"&query="+ keyword,
    method:"GET",
    dataType: 'jsonp'
    }).then(function(response) {
        var results = response.results;
         $("tbody").html("");
         if(results.length==0){
             $("tbody").append("No results found.");
         }else{
            for(i=0; i < results.length; i++ ) {
                var movieName = results[i].title;
                var releaseDate = results[i].release_date;
                var poster = "https://image.tmdb.org/t/p/w500"+ results[i].poster_path;
                var vote_average = results[i].vote_average;
                $("tbody").append("<tr> <td> <img src='"+poster+"'/> </td>    <td>"+movieName+"</td>   <td>"+releaseDate+"</td> <td>"+vote_average+"</td> </tr>");
            }
         }   
    });
});
</script>




