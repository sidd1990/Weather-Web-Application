<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">WDM Project # 3</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <form class="navbar-form navbar-right">
            <span class="form-group" style="color:white;font-size: 2em;padding-right: 10px">Siddhant Attri</span>
            <div class="form-group">
              <input type="text" placeholder="Search Paintings" class="form-control" id="barSearchData">
            </div>
            <button type="button" class="btn btn-info" onclick="barSearch()">Search</button>
          </form>
            <ul class="nav navbar-nav">
                <li><a href="default.php">Home</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="active"><a href="Part01_ArtistsDataList.php">Artists Data List (Part 1)</a></li>
                        <li><a href="Part02_SingleArtist.php">Single Artist (Part2)</a></li>
                        <li><a href="Part03_SingleWork.php">Single Work (Part 3)</a></li>
                        <li><a href="Part04_Search.php">Advanced Search (Part 4)</a></li>
                    </ul> 
                </li>
            </ul>
        </div>
    </div>
</nav>
