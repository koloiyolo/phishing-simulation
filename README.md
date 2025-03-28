# Phishing attack simulation

This repository contains php scripts for webserver used as part of Phishing Campaign Simulation.

These scripts inform the users that they failed the simulation by clicking on malicious link, attached to the email. These scripts also collect information that will help to identify users, potentialy open for these types of attacks. 

The output comes in English and Polish versions, depending on SIMULATION_LANG variable defined in `.env`

"Malicious" link:
`http://your_server`

Results page:
`http://your_server/result.php`

## Installation

### Docker installation

1. Clone this repository

```
git clone repo
```
2. Set environment variables using `vim` or `nano`

```
nano .env
```

3. Run using docker
```
docker run -p 8000:80 --env-file .env $(docker build -q .)
```

### Manual installation

on Ubuntu

1. Install Apache HTTP Server
```
apt install apache2 -y
```

2. Go to `/var/www/html` directory
```
cd /var/www/html
```

3. Clone this repository

```
git clone repo
```
4. Set environment variables using `vim` or `nano`

```
nano .env
```

5. Load environment variables

```
. .env
```

Now You can see results at: 

`http://your_server:result.php`


## Example mail message

Here are example mail messages used to simulate the attack.

English: 
```
Good morning,

on behalf of the board, we would like to remind you to sign up for the optional Cyber Awarness training.

The training will be held during business hours this Thursday, and lunch will be served after the training.

More details, as well as the opportunity to sign up, can be found at the link below.

Greetings
Human Resources Team
```

Polish: 
```
Dzień dobry,

w imieniu zarządu przypominamy o zapisach na nieobowiązkowe szkolenie z zakresu Cyber Awarness.

Szkolenie odbedzie się w godzinach pracy w najbliższy czwartek, a po szkoleniu zaserwowany zostanie obiad.

Więcej szczegółów, jak i również możliwość zapisu znajduje się pod poniższym linkiem.

Pozdrawiamy
Zespół Kadr
```
