# Sql Injection 
This is a mini php + mysql search bar function for sql injection experiment. 
Search bar searches premium shoes and the quantity available. The 's_search.php' shows
how to mitigate sql injection properly. 

# Clone this repo

git clone https://github.com/jakwanhussain/sql-injection-php.git


# Installation

(1) For hosting php, Localhost https://www.apachefriends.org/download.html

(2) After downloading Xammp, PHP my admin for hosting mysql database which can be obtained from http://localhost/phpmyadmin

(3) Create a database 'phpsearch' and inside it a table is called 'shopping'

(4)'shopping' schema: 
  CREATE TABLE shopping(
  id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title varchar(256) NOT NULL,
  description text NOT NULL,
  quantity int(100) NOT NULL)
  
(5) INSERT INTO `shopping`(`title`, `description`, `quantity`) VALUES ("a","b",3);
  
Most importantly have fun!