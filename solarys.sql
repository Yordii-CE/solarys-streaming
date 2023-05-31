CREATE DATABASE solarys;
use solarys;

create table users(
	id int primary key auto_increment,
    email varchar(50) unique,
    password varchar(50),
    preferences set('Terror', 'Suspence', 'Fancy', 'Science fiction'),
    isPremium enum('yes', 'no')
);

create table movies(
	id int primary key auto_increment,
    title varchar(30),
    genre set('Terror', 'Suspence', 'Fancy', 'Science fiction'),
    url varchar(255),
    visibility enum('free', 'premium')    
);

insert into users(email, password, preferences, isPremium) 
values('hola@gmail.com', '12345', 'Terror,Fancy', 'yes');

insert into movies(title, genre, url, visibility)
values('Guardians of the Galaxy', 'Science fiction', 'https://www.youtube.com/watch?v=uUdwFc3sDRo', 'premium');

insert into movies(title, genre, url, visibility)
values('Infinity War', 'Science fiction', 'https://www.youtube.com/watch?v=0KW3thppa0k', 'premium');

insert into movies(title, genre, url, visibility)
values('Wonder Woman', 'Fancy', 'https://www.youtube.com/watch?v=HXIwkbcwIfU', 'free');

insert into movies(title, genre, url, visibility)
values('Ben 10', 'Suspence', 'https://www.youtube.com/watch?v=zAH-GjT4Jpw', 'free');

     update users 
        set isPremium = 'yes'
        where email = 'aaasasasas@gmail.com';

select * from users;
select * from movies;
