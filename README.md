# What is this?
A simple scaffolding to start working on a PHP app quickly, with Docker.  
There is no special configurations needed.
If you want to work with Laravel or Symfony on top of this, you are at the right place.

# Tools & versions
The current tools and versions included in this configuration are:

- PHP:8.3
- Caddy:2.8
- PostgreSQL:16

## Not included
npm is not included, it is more convenient to have it installed locally.

# Requirements
Docker is needed, of course.

mkcert is used for local development, to make locally-trusted development certificates.  
Install it from there: [mkcert](https://github.com/FiloSottile/mkcert)

Then, in a terminal, run:
```
mkcert -install
```

Then, run:
```
mkcert -key-file caddy_certs/key.pem -cert-file caddy_certs/cert.pem localhost 127.0.0.1
```
This will also create local certificates, that will be used by the Caddy server in Docker.

You'll need to **restart your browser** for this to take effect.

# Install

First, check the requirements above, as you need mkcert.
Then, run:
```
docker compose --env-file .env.docker build
docker compose --env-file .env.docker up -d
```

Finished!  

Go on https://localhost  
You should see a simple page indicating that all is working.
If you have a problem with the Database, follow the instructions on the page.

## Configuration

There is a .env.docker file included with default and working parameters.  
You can change them to your convenience.

# Production mode

A `Caddyfile.production` file is present and can be used with Cloudflare, just replace the key.
Same for `docker-compose.production.yml`, which is a very basic configuration for the services to always restart.
It is not scalable but works for something simple.

For deployment to a server, there is `.github/workflows/php.yml` which is a GitHub action packaging and deploying the code via [AWS CodeDeploy](https://docs.aws.amazon.com/codedeploy/latest/userguide/welcome.html).

Then, there is an [`appspec.yml` file](https://docs.aws.amazon.com/codedeploy/latest/userguide/reference-appspec-file.html), which is used by AWS CodeDeploy.
The folder `scripts/` is also linked to this.

You can remove these files and folder if not needed without worrying.
