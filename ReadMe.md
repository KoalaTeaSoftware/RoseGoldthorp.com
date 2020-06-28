# RoseGoldthorp.com

 **This is a portfolio website for a budding film director.**

It started life as very simple site using the Dreamweaver programme (before Adobe bought it), hence the legacy template comments. It uses Twitter Bootstrap to do all the clever presentation stuff (like responsive layout). As Adobe costs more and more, I have stopped using Dreamweaver and am using PhPStorm (which is really rather good). The migration to a clean structure not based on Dreamweaver templates has not been scheduled - at the moment the work / risk balance is such, in the light of other projects, that it just does not get out of the ToDo bin.

Soon after its first build, it became evident that the content of at least some of the chapters was more dynamic than initially imagined, so the pages of these chapters are dynamically built from a JSON file, using JavaScript. This has significantly reduced the amount of dev. time needed when the content has to change for BAU (e.g. add another film), but it remains a fiddly process.

* The site shows early steps towards a home-brew system of offering 'sensible URLs', but it needs improvement.
* The contact form is hard coded and uses both client-side (JavaScript) and server-side (PHP) validation of user input.
* The site uses MailChimp for its newsletter subscription form.
