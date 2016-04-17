<html>
  <?php session_start(); ?>
  <head>
    <title> Movie List </title>
    <meta charset="UTF-8">
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/styles/main.css">
    <script src="bower_components/bootstrap/js/modal.js"></script>
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/images/movielist-logo.png" sizes="16x16">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script>
        function ajaxCall() {
            var searchText = document.getElementById("searchInput").value.split(" ");
            searchText = searchText.join("+");

            $.ajax({
            url: "http://www.omdbapi.com/?t=" + searchText + "&y=&plot=short&r=json",
            dataType: "json",
            success: successFunction
            });
        };

        function successFunction(data) {
            if (data.Response === "False") {
                document.getElementById("paragraphSection").innerHTML="";
                alert("Movie not found");
            } else {
                $.ajax({
                  url: "http://cis.gvsu.edu/~sinclaik//project/371project/insertMovie.php",
                  data: {title: data.Title, releaseDate: data.Released, year: data.Year, runTime: data.Runtime, genre: data.Genre, director: data.Director, actors: data.Actors, plot: data.Plot, imdbRating: data.imdbRating, poster: data.Poster},
                  type: "GET",
                  context: document.body,
                  success: function() {document.getElementById("searchListSection").innerHTML="yay";},
                  error: function() {document.getElementById("searchListSection").innerHTML="nooo";}
                });

                var movie = "<p>" + data.Title + "</p><p>" + data.Year + "</p><p>" + data.Rated + "</p><p>" + data.Released + "</p><p>" + data.Runtime + "</p><p>" + data.Genre + "</p><p>" + data.Director + "</p><p>" + data.Writer + "</p><p>" + data.Actors + "</p><p>" + data.Plot + "</p><p>" + data.Awards + "</p><p>Metascore: " + data.Metascore + "</p><p>IMDB Rating: " + data.imdbRating + '</p><p><img src="' + data.Poster + '"></p>';

                document.getElementById("paragraphSection").innerHTML=movie;
            }
        };
    </script>

 </head>
       
 <body>
     
     <!-- Navbar -->
     <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Brand and toggle get groupe for better mobile view -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#movieBarNav">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <!-- <img src="assets/images/movielist-logo-name.png" alt="" style="width:150px; height:150px;"> 
                        -->
                        Movie List
                    </a>
                </div>
                <!-- Collect the nav links, forms etc -->
                <div class="collapse navbar-collapse" id="movieBarNav">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="create-list-modal" data-toggle="modal" data-target="#create-list-modal">Create List</a>
                        </li>   
                        <li>
                            <a href="search-list-modal" data-toggle="modal" data-target="#search-list-modal">Search Lists</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
      </nav>
                    
    <!-- Modal for Creating a list --> 
    <div class="modal fade" id="create-list-modal" tabindex= "-1" role="dialog" aria-labelledby="modelLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="modelLabel1">Create a List</h4>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="inputName" placeholder="List Name" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Model Footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Create</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- / Create a list Modal -->
    <div class="modal fade" id="search-list-modal" tabindex="-1" role="dialog" aria-labelledby="modal-label-2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
        <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="modal-label-2">Search a List</h4>
                </div>
                <!-- /Modal header -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="col-sm-10">
                            <input type="list-name" class="form-control" id="search-list-name" placeholder="Fill me" />
                        </div>
                        <div class="form-group">
                            <div class="col-smoffset-2 col-sm-10">
                            </div>                            
                        </div>
                    </form>
                </div>
                <!-- /Modal Header -->
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Search</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                <!-- /Modal Footer -->
            </div>
        </div>
    </div>
    
                       
   <!-- Modal for Searching a list --> 
            
    <div id="container search">
        <div class="featurette">
            <div class="featurette-inner text-center">
                <form role="form" class="search has-button">
                    <h3 class="no-margin-top h3">Search movies. Create a list.</h3>
                    <div class="form-group">
                        <input id="searchInput" type="search" placeholder="Search movie database" class="form-control form-control-lg">
                        <button onclick="ajaxCall()" class="btn btn-lg btn-warning" id="movie-search-button" type="button">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <section id="content-section">
        <div class="col-md-6"><p id="paragraphSection"></p></div>
        <div class="col-md-6">
            <p id="searchListSection"></p>
            <h3 id="list-name">Search or Create a List to View</h3>
                <table class="table" id="list-table">
                    <thead>
                        <tr>
                            <th>Movie</th>
                            <th></th>
                            <th><th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Example Data</td>
                            <td><button onclick="removeFromList()" class="btn btn-sm" id="remove-from-list" type="button">Remove</button></td>
                        </tr>
                        
                    </tbody>
                </table> 
        </div>
        
    </section>
 </body>

</html>
