CREATE TABLE IF NOT EXISTS `#__enquiry` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`employee_count` VARCHAR(11)  NOT NULL ,
`using_biometric_machine` BOOLEAN NOT NULL DEFAULT 1,
`biometric_machine_model` VARCHAR(11),
`salary_processing` VARCHAR(255)  NOT NULL ,
`solution_required` BOOLEAN NOT NULL ,
`internet_connectivity` VARCHAR(255)  NOT NULL ,
`computer_at_office_location` BOOLEAN NOT NULL ,
`name` VARCHAR(255)  NOT NULL ,
`email` VARCHAR(255)  NOT NULL ,
`mobile` BIGINT NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8mb4_unicode_ci;

