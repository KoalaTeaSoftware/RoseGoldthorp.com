# Released Features

* chapters/released-features/contents.php
* This is the 'root' of the page, it is pulled-in by the page drawer
* It is relatively static PHP, in that it is not data driven, but all the various different pieces about the different films are hard-coded
* I think that it is structured this way now because AM was wanting to have a different layout, particularly of the wessex dramas stuff. I think that the coded stuff was unreliable, so I made a hard-coded version.
  
## To add another movie 
* duplicate the second level card (div#released-features>.card .card)
* The css uses this long locator to put the border around each of these
* Take notice of the sizes of the posters. Most easily you can set the width when you export a jpeg into ass/filmDetails/public

## ass/filmDetails/filmData.php
* F7 gives the idea that this is redundant, but it is easy to fool this with the way I have built this site.
* It is an array of stuff about Rosie's older (NZ) films

## chapters/released-features/films/contents.php
* This appears to be redundant
* It looks as if it was the component that built the individual pieces that is defined int the above filmData file.