# Captcha Generator

A captcha is randomly generated from 2 types.

If the given answer is correct, you get redirected to a new page, if incorrect you get a new randomly generated captcha
and the server logs the unsuccesful event

# How to use:
You'll need php with php-gd installed on your system (on apt based systems you can do ```apt-get install php-gd```)

You can start the php server with the command: ```php -S localhost:8080```

You can now enter ```localhost:8080``` into your browser

Alternatively, you can use a docker image to have everything ready: ```docker pull meeoro/captcha:latest```

Run the docker image with the following command: ```docker run -it -p 8080:8080 captcha```
