<?php
include 'includes/header.php';


$msg = $link = '';
?>

	<div class="container">
		 <!--serach section-->
	    <section class="section">
	        <div class="container">
	            <div class="row">
	                <div class="col s12 section-search teal darken-1 white-text center">
	                    <h3><span class="web">Retrieve Your Receipt</h3>
		                <form action="includes/search.php" method="POST" id="search" >
		                	<div class="input-field">
		                        <input type="text" class="white grey-text autocomplete" id="search-input" placeholder="Product ID number" name="search">
		                        <button type="submit" class="btn btn-large orange" name="submit" id="search-btn"><b>Search</b></button>
	                      	</div>
		               	</form>
	                </div>
	                <br>
	                <a href="@" class="red-text right "><b>forgot Receipt Id..?</b></a>
	                  <br><br>
                  <div class="col s12">
                  	<p class="teal-text flow-text center" id="data"></p><br><br>
                  </div>
	            </div>
	        </div>
	    </section>
	</div>

<?php
include 'includes/footer.php';

?>
