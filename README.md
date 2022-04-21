# Portfolio
Re-did my portfolio using Symfony and EasyAdmin to be able to add new projects and change the content of the page 
more easily.  
See the previous version of my portfolio, using only HTML/CSS [here](https://github.com/Lauric-h/portfolio)  

## Usage
### Requirements
- PHP 8.0
- Composer
- Symfony CLI
- Docker
- Docker-compose
- Nodejs & npm

**Check with**
```bash
symfony check:requirements
```

### Start dev environment
```bash
docker-compose up -d
composer install
npm install
npm run build
symfony serve -d
```

### Tech stack
- PHP 8.0
- Symfony 5.4
- EasyAdmin 4
- VichUploader
- Docker
