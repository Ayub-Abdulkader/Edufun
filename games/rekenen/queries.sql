USE edufun;

CREATE TABLE `quiz-score` (
	Id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usersId int(11) NOT NULL,
    usersUid VARCHAR(100) NOT NULL,
    score int(11) NOT NULL,
    games VARCHAR(100) NOT NULL
);