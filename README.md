# CSC174-Midterm

Website Location:

Github Location: https://github.com/DijonLee/CSC174-Midterm

Database Information: 

         $dbhost = "66.147.242.186";
         
         $dbuser = "urcscon3_jlee";
         
         $dbpass = "!QAZ2wsx";
         
         $dbname = "urcscon3_jlee";
         

# Information Architect

Topic: Sterling Cooper - An Advertisement Agency

Goal: Present information about the topic and get users to sign-up for a newsletter


## Ontology
**On the cover page** the most important part is to have a aestheically pleasing look and a short summary of what the website will be representing. To demonstrate this I ensured a minimalistic, modern and business-esque look for the website to capture the users attention and encourage him to scroll on. Use's are given three options 1. Login/Register, 2. View Portfolio, 3. Scroll on and view the website. By presenting the user with limited choices they are more inclined to pick one that I crafted for them. Furthermore any users already "convinced" by the website and are interested can directly view work by using the Our Work button which will direct them to the portfolio instantly with an added animation.

**For the who paragraphs** the most important part is to describe the to the observer (if they are not already convinced) to discover more about Sterling Cooper by offering a breif history of Sterling Cooper and provide a personal touch by presenting the team.


**For the portfolio** the most important part is the automatic portfolio scrolling and presentation of recent work of Sterling Cooper. I attempt to grab the users attention with an automatic scrolling portfolio as well as provide them with the opportunity to view other work.

**For the signin/register,** the most important part are the two available options (located in each nav nab) that allow the user to seamlessly create an account or login.

**For the account page** the most important things are the ability of the user to view their profile information and send a message to the user. The account page already contains the information the user registered with and automatically presents it to them. What I would like to do is add the ability to edit their account information as well as view any recent messages.


## Choreography 
The choreography of the website (the way things are presented) is each page has a navbar located at the top but differs depending on whether they are logged in or not and background cover photo is identical on each page. The index page is represented in the following order Cover Page -> Short Summary -> Our Team -> Portfolio -> Sign up-> Account Page. However if the user wants to immediately sign up they have the option to do so via the login or by clicking the portfolio and signing up from there 

## Taxonomy
THe HTML taxonomy reflects the aspect being identified. I used div's and id's to self-explain what is being identified and also created comments within my code to help explain any ambiguous taxonomy. 

# Design

## Style: 

I attempted to create a modern,mininal and professional business page. After looking at many modern HTML5 and Responsive web pages they all share common features. The most prominent exmples of "aesthically" pleasing financial websites are "Alleghany" and "JPMorgan". Almost all financial websites follow a style simialr to the clothes suits they wear. They are usually black, serious, and xxxxxxxxxxxx.  In order to create a similar design I employed the use of Bootstrap's Cover component to ensure the first thing the user see's is aesthetically pleasing, contains a short summary of the website and enables them to explore or have options on where they'd like go to the homepage (navbar).  The next step was to provide a quick summary to new users to learn more about Sterling Cooper and provide examples of their work. I ended the content with a Learn More button to encourage more clicks (and not necessarily assuming registration). The account page follows an almost synonomous styling except for the menu tabs. Although not largely populated they still remain in the center and provide the user imediate access to content. https://github.com/DijonLee/CSC174-Midterm/tree/master/architecture

 ## Typeface/Font  
I applied Google's Raleway and Playfair Display Fonts. I used these in order to create a modern, sleek, and clean design that would reflect the professional business aspect and pair well together.


## Strcuture Explanation CSS Architecture:
Because Bootstrap provided a CSS architecture for their starter cover template I decided to follow a similar architecture. I organized the CSS into the order in which they are presented as well as created organizing by listing the div and elements being effected. I alsoa attempt to list explanations for why CSS styles were created.

## Z and F Pattern Layout
(Why you put what you did in each quadrant)

I used the Z layout in the upper "Welcome" quadrant of the project. I decided to follow a modified version of the Z layout for this project to provide a unique style to the website can be seen on the first pain (main index). When determing what would be lined up left to right I took inspiration from many major business websites including "modern" minimalistic ones such as Alleghany. Both the Z and F layouts stay constant throughout the webpage with F Layout being displayed when you view headers, founder images, and buttons or portfolio. To provide a digital representation and more in depth explanation on the style link noted. 

## CRAP Principles descibed and Explained 

**Contrast:**

Important elements are visually different from each other. Text color is contrasted from background color and image and help to achieve user focus and visual heiarchy

**Repitition:**

There exist repitition of color, style, layout, typography. For specific examples you can look at the section paragraph styles, and dividers for each header.  

**Proximity:**

All elements that are close together have a relationship to provide additional resources and links to topic

**Alignment:**

There exists left,center, and right alignments within the webpage. The predominate view of alignment can be seen on the cover apge where the brand floats left, nav elements float right and all content floats middle. Through the page content stays in the middle with sub-alignments for certain elements. The team elements have all three alignments.

**Proximity:**

I placed items close together to ensure a locational relationship. When looking at proximity the cover page maximized proximity and minimalism by placing all objects close together for their prospective links. The Founders area located in the same proximity to the founders pargraphs and company logo and the portfolio is located directly under the portfolio header. Furthermore the newsletter is located directly under the portfolio so that users have the opportunity to sign up after viewing recent artworks.

# Technical Coding

## Login 
To implement Login and Registration I used a combination of PHP,SQL, JS, JQuery and HTMl. I created a dual tab Login/Register form and styled it with CSS to allow for a simple and seamless login form. Upon clicking the login button you will be greeted by a dual tab asking you to login or you may also click register. I also used an if isset function to determine which button was being clicked (register or login).  Using a PHP post request to connect to the SQL server. Upon clicking login, the PHP will run a script to determine whether the email/password comibination is located in the server. If it is located within the server it will return a 1 and provide a cookie to the user with the trimmed email and redirect them to the account page. If the account is not located within the server it will alert the user that the account or email were incorrect and to try again. 

## Registration
Registration works via a PHP POST request to the SQL server. Upon clicking the register button the PHP will run the backup.php form as a post request, determine the correct action (register) and Insert the user's data into the SQL server. Once the user is registered it will alert the user they were sucessfully registered and they will be allowed to login with their new credentials.


## Account Information
To recieve the user account information, I use the cookie provided from login to search and return the users information from the server based on what is registered under that email. 

## Inbox
User have the ability send a message to the server that automatically populate a SQL entry with their provided information linked to their account

## Cookies
To maintain user login state throughout the webpages I decided to a "email" cookie with the user's email. To ensure a login state across pages I made a cookie that would be set to expire in one day or when the user prompts a logout. This was used as a simple and easy way to store session state becuase no secure techniques were required (e.g salt or hashing). 

## Logout

In order to logout I use a simple PHP cookie command to set the user's cookie to expire after 3600ms (3.6 seconds) and direct them back to the homepage.


## Attempted Aspects
### Ability for User to update their information
Although I already have the ability to update information within a databse I decided due to time constraints I would not be able to add user ability to update their information in the server.

### Custom Favicon Icon Created


         


## Citations

Influenced by: 

Grayscale bootstrap template: https://blackrockdigital.github.io/startbootstrap-grayscale/

Tabbed Login https://bootsnipp.com/snippets/featured/loginregister-in-tabbed-interface

Alleghany https://alleghany.com/Home/default.aspx

Used Resources: 

Bootstrap Cover Template https://getbootstrap.com/docs/4.0/examples/cover/ (Used Bootstrap 4's strater template for styling)

Bootstrap Components https://getbootstrap.com/docs/4.0/components
