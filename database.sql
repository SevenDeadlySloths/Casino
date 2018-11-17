

create table user(userID int auto_increment primary key , firstname varchar(50),lastname varchar(50), username varchar(100), email varchar(200), photo varchar(100),password varchar(254), money int,description varchar(500), DOB varchar(50), city varchar(50), country varchar(50), phone varchar(50));

create table slots(userID int, moneySpent int, moneyWon int, totalSpins int, highestBet int, highestWin int);

create table pairSlots(userID int, cherries int, oranges int, grapefruits int, bells int, bars int, sevens int, totalWins int);

create table threeSlots(userID int, cherries int, oranges int, grapefruits int, bells int, bars int, sevens int, totalWins int);

create table fourSlots(userID int, cherries int, oranges int, grapefruits int, bells int, bars int, sevens int, totalWins int);

create table fiveSlots(userID int, cherries int, oranges int, grapefruits int, bells int, bars int, sevens int, totalWins int);

create table session(userID int, session varchar(100));
