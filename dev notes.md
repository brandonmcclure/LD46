# 2020.04.17 
## 6pm
Getting my code and repo setup.
Following <https://phptherightway.com/> to help get me started on the right foot. 

Using <https://github.com/php-pds/skeleton> as the standard for structureing my code


## 8:44 PM
Have some ideas down on paper. A basic "snake" type game where you need to keep "it" alive and loose lifeforce over time would be cool. IDK how to do animation, will need client scripting for that, so also thinking a text based game would be cool. 

Maybe you are a vet and you need to keep "it" alive, but all you have is a silloute and some vague info, then you select a habitat, food, and some recreation for it to do. You either kill it or not....


Had an idea that rips off of Seedship for android and my current fav No Mans Sky. You have to keep a ship alive over a long journey. would be text based. Think of a organic starship that could grow/evolve as you go, or you could totally kill it. 

# 2020.04.18
## 12:38pm
Basics for a state machine and repositories to get strings and random events. I am still torn between the last 2 ideas, but I think this is a good foundation. Coming from .net this seems to be a pretty easy transition although right now my app is only bouncing between a 2 states, and is throwing errors. :-)

## 11:07 am
Some good resources I found while trying to make the page prettier

Bootstrap using the jumbotron template: <http://technicalrex.com/2014/10/01/using-bootstrap-and-angularjs-for-a-simple-turn-based-game>

How to use sessions: <http://example.preinheimer.com/sessobj.php>

general tips: <https://24ways.org/2012/how-to-make-your-site-look-half-decent/>

## 7:29pm
Got the mechanics for feeding the creature working and cleaned up the look (and the code a bit). Started working on how I will deploy, attempting through Azure. 

I need to expand the different types of food you can give, and add some more events that will be a threat to the creature. some extra attributes on the creature would be good as well. I think a relationship indicator for you. 

Stretch goals would be to setup some more randomness in which strings are selected/how descriptions are given. Also some better css/graphic design.

# 2020.04.19
## 4:51 pm
TODO: 
* change Source code link css to like the home button

# 2020.04.20
## 4:17 pm
I calling this done. Of course there is more I could do. Specifically I would have liked to setup more attributes and re balance the whole "life force" concept. It tracking how many times you make a choice that is negative for it and disliking you (and therefore responding more harshly for some events) or liking you when you treat it well (and therefore behaving better for you). I think I did improve my css/graphics since saturday, although that was time not well spent as I setup bootstrap only to scrap it and build my css from scratch (although I did look at bootstrap alot for examples)

I would have preferred to spend less time mucking with getting the PHP to deploy on azure, but was a good experience working through the PHP configuration and the kudo(sp?) console/general debugging steps needed. 

I also wish I would not have run into the UTF8-BOM issues. The `MakeAllUTF8-NoBOM.ps1` script should be built into MS's default PHP deployment imo. 
