![https://media.giphy.com/media/9qC5gROu8bYPSqpoPX/giphy.gif](https://media.giphy.com/media/9qC5gROu8bYPSqpoPX/giphy.gif)

# Yrgopelago

Wouldn't it be nice to have your own island, with your own hotel on it? Wouldn't it be nice if there were about 25 other islands in the neigbourhood so you could travel around?

Yeah, it would be nice.

## Assignment

You need to do the following:

- Create an island. Pick from your own imagination or check out [a list of fictional islands](https://en.wikipedia.org/wiki/List_of_fictional_islands)
- Find a name for your hotel.
- Setup a domain for your site, preferably on your one.com-account.
- Use your startCode at [the central bank of Yrgopelago](https://www.yrgopelago.se/centralbank) to get your own, secret and extremly valueable API_KEY. Please keep it in the .env in your project.
- Build a tiny website or just a web page for your hotel (see [requirements](#requirements) and [the four hotel rules](#the-four-hotel-rules) and [hotel build instructions](#hotel-build-instructions) below)
- Register your island and hotel at [the central bank of Yrgopelago](https://www.yrgopelago.se/centralbank) using your API_KEY
- Create a database for your hotel, so that you can store information about your visitors arrival and departure date, which room and such information.

## Requirements

Below you'll find a list of requirements which need to be fulfilled in order to complete the project.

- The application should be written in HTML, CSS, JavaScript, SQL and PHP.

- The application should be built using a SQLite database.

- The application should be pushed to a public repository on GitHub.

- The project should declare strict types in files containing only PHP code.

- The project should not include any coding errors, warning or notices.

- The repository should have at least 20 commits and you have to commit at least once every time you're working on the project.

- The repository should be created from the template repository [yrgo/template-yrgopelago](https://github.com/yrgo/template-yrgopelago).

- The repository should contain the SQLite database file.

- The repository must contain a README.md file with a description of the project and possibly instructions.

- The repository must contain a LICENSE file with some useful information.

- You must follow the [four hotel rules](#the-four-hotel-rules)

- Please enter your repository and website in [projects.csv](./resources/projects.csv)

- The project must receive a code review by another student. Add at least 10 comments to the student's README.md file through a pull request. Give feedback to the student below your name. The last student gives feedback to the first student in the list. Add your feedback one day before the presentation.

### Hotel managers
- Simon Lövbacka
- Anna Brumark
- Thomas Danielsson
- Tobias Åhlund
- Dan Fogelberg
- Jonas Mårtensson
- Douglas Lindahl
- Johanna Pihl
- Magnus Vargvinter
- Tommi Uusitalo
- Ruben Olander
- Josef Forkman
- Filip Jonasson
- Robin Persson
- Adam Garali
- Emma Hedlund
- Lucas Källberg
- Styrbjörn Nordberg
- Axel Enghamre
- Alfred Unenge
- Vali Al Osachi
- Petter Jakobsson
- Siri Sjölin
- Niklas Johansson
- Hampus Selldén
- Gustav Enoksson

---

## The four hotel rules

1. Every hotel has exactly three single rooms (budget, standard and luxury), so you can only have three guests at the same time.

2. As a manager, you set the price for your three rooms, but you should probably adjust the price according to the room standard and the star rating of the hotel. The more stars, the higher the cost.

3. The hotel website must have a form where visitors can book a room.

4. As a manager, you will check for how many stars your hotel is qualified to, and the hotel website should display this info.

### Stars <span style="color:red;">&star; </span><span style="color:yellow;">&star; </span><span style="color:green;">&star; </span><span style="color:blue;">&star; </span><span style="color:purple;">&star; </span>

Every hotel has a star rating (0-5), and you decide for yourself the level you are aiming for. If you want to build a five-star top class hotel, you'll have to strive for it. If you are more modest, start with a crappy hotel and see if you want to advance later on. The Rome Hilton wasn't built in a day.


*(You could build a hotel that you run 100% manually, as long as you fulfill the [requirements](#requirements), [the Hotel build instructions](#hotel-build-instructions) and [the four hotel rules](#the-four-hotel-rules).)*


One star for each fulfilled achivement below.

  &star; The hotel website has a graphical presentation of the availibility of the three rooms. (*There's some nice packages that can simplify that part. Try to google php package calendar*)

  &star; The hotel website can give discounts, for example, how about 30% off for a visit longer than two days?

  &star; The hotel can offer at least one feature that a visitor can choose, for example a tour of the island, or a free minibar filled with Fanta.

  &star; The hotel has an API that can handle bookings by POST request to the url endpoint `/bookings` (www.your-hotel.se/api/bookings)

  &star; The hotel manager has some sort of admin page - accessible only by using your API_KEY - where different data can be altered, such as room prices, the star rating, discount levels and whatever you can think of.


## Hotel build instructions

- Your hotel MUST give a response to every succesful booking. The response should be in json and MUST contain the following properties:
    - island
    - hotel
    - arrival_date
    - departure_date
    - total_cost
    - stars
    - features
    - additional_info. (This last property is where you can put in a personal greeting from your hotel, an image URL, link to a youtube video or whatever you like.)
- The booking calendar MUST be fixed to show only january 2023. Use attributes min and max in the input.
- Your hotel MUST check availibilty of the requested room and dates before making the booking and sending the response package as json.
- Your hotel MUST check if a transferCode submitted by a tourist is valid and valuable, by a [POST request to the central bank](https://www.yrgopelago.se/centralbank/transferCode).

## API endpoints

You may need to communicate with the central bank. Some of the endpoints below can be accessed by different forms at the central bank, but some is better accessed programmatically (by fetch, guzzle etc).

BASE URL: https://www.yrgopelago.se/centralbank

| ENDPOINT | METHOD | DESCRIPTION | INPUT |
| -------- | ---------- | ------------- | -------|
| / | GET | Centralbank website ||
| /islands | GET | A list of the islands and the hotels ||
| /islands | POST | Submit your island | Same data as in the form at centralbank start page |
| /startCode | POST | To get your API_KEY | {'startcode': 'your-startcode'} |
| /transferCode | POST | Check if a transferCode is valid and unused | {'transferCode': 'the-transfercode', 'totalcost': 10} |
| /withdraw | POST | Create a transferCode | {'user': 'your-username', 'api_key': 'your-api-key', 'amount': 10} |
| /deposit | POST | Consume the transferCode into money | {'user': 'your-username', 'transfercode': 'the-transfercode'}|

# Test
When you want to test your hotel, please use the test-tourist `Rune` with api_key `ab14cbb2-f550-46e6-97c2-bb7f0126733e`

# Showtime - Thursday january 12th

    We meet at school if healthy,
    and present our fine hotel,
    then decide who be poor, who be wealthy,
    only the visitor stats will tell.

To clarify, we will meet at school, and for some time go into tourist mode and have a vacation (try out each others hotel). Each student will travel around Yrgopelago. 

While spending up to 31 days at different hotels and trying to score [points](#awards--points-for-the-tourists) and qualify for [awards](#awards-for-the-hotel-managers) and also try to be as economic as possible, the tourist will use the **same** account as he/she uses as hotel manager. 

So the hotel that you been building earns money, and you as a tourist spends money when traveling around.

Every response you get from a hotel on booking should be saved in your [logbook.json](https://github.com/yrgo/template-yrgopelago/blob/master/logbook.json). You will probably do this manually by copy+paste.

## Points for the tourists 

- 1 point for every star category you've visited (max 5 points).
- 1 point for every different feature you used
- 1 point for every day you've stayed at a hotel

Three highest points win prizes.

## Awards for the hotel managers

- Prize for the most money left on account
- Prize for highest occupancy rate
- Prize for nicest hotel site (selected by tourist vote)

The total points could be summed up manually, or you could build a small php program that reads your logbook and calculate this automatically.

# Prizes
:gift: There will be an assortment of small prizes for the three best tourists and the best hotel managers.

# Good luck and don't hesitate to ask questions
Hans the teacher is *always* available on the usual channels, but response time may vary during most intense holiday season. 

Furthermore, you could communicate on our discord channel `yrgopelago`.
