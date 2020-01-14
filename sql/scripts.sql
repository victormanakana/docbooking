CREATE Patient (
    patientCode int NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    surname VARCHAR(100) NOT NULL,
    idno VARCHAR(13) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(10) NOT NULL,
    address VARCHAR(100) NOT NULL,
    postalCode VARCHAR(4) NOT NULL
)

CREATE Bookings (
    id int NOT NULL AUTO_INCREMENT,
    patientCode int NOT NULL,
    bookingDate DATE NOT NULL,
    bookingStatus VARCHAR(50),

    PRIMARY KEY(id),
    FOREIGN KEY(patientCode) REFERENCES Patient(patientCode)
)