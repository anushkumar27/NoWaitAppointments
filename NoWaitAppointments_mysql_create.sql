CREATE TABLE `Users` (
	`name` varchar(100) NOT NULL,
	`id` DECIMAL(100) NOT NULL AUTO_INCREMENT,
	`type` BINARY(1) NOT NULL DEFAULT '0',
	`password` varchar(100) NOT NULL,
	`address` varchar(100) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `UserProfile` (
	`dob` TIMESTAMP(100) NOT NULL,
	`id` DECIMAL(100) NOT NULL,
	`currentLat` DECIMAL(100) NOT NULL,
	`currentLong` DECIMAL(100) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `ServiceProfile` (
	`categoryId` DECIMAL(10) NOT NULL,
	`currentLat` DECIMAL(100) NOT NULL,
	`currentLong` DECIMAL(100) NOT NULL,
	`id` DECIMAL(100) NOT NULL,
	`price` DECIMAL(100) NOT NULL,
	`limit` DECIMAL(100) NOT NULL,
	`durationStart` TIMESTAMP(100) NOT NULL,
	`durationStop` TIMESTAMP(100) NOT NULL,
	`rating` DECIMAL(10) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Category` (
	`categoryId` DECIMAL(10) NOT NULL AUTO_INCREMENT,
	`name` TIMESTAMP(100) NOT NULL UNIQUE,
	`desc` varchar(500) NOT NULL,
	PRIMARY KEY (`categoryId`)
);

CREATE TABLE `Appointment` (
	`aid` DECIMAL(100) NOT NULL AUTO_INCREMENT,
	`requestId` DECIMAL(100) NOT NULL,
	`serviceId` DECIMAL(100) NOT NULL,
	`aTime` TIMESTAMP(100) NOT NULL,
	`status` BOOLEAN(1) NOT NULL,
	`closure` BOOLEAN(1) NOT NULL,
	PRIMARY KEY (`aid`)
);

ALTER TABLE `UserProfile` ADD CONSTRAINT `UserProfile_fk0` FOREIGN KEY (`id`) REFERENCES `Users`(`id`);

ALTER TABLE `ServiceProfile` ADD CONSTRAINT `ServiceProfile_fk0` FOREIGN KEY (`categoryId`) REFERENCES `Category`(`categoryId`);

ALTER TABLE `ServiceProfile` ADD CONSTRAINT `ServiceProfile_fk1` FOREIGN KEY (`id`) REFERENCES `Users`(`id`);

ALTER TABLE `Appointment` ADD CONSTRAINT `Appointment_fk0` FOREIGN KEY (`requestId`) REFERENCES `Users`(`id`);

ALTER TABLE `Appointment` ADD CONSTRAINT `Appointment_fk1` FOREIGN KEY (`serviceId`) REFERENCES `Users`(`id`);

