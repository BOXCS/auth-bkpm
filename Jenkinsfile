node {

 stage("Checkout") {
  checkout scm
 }

 stage("Install Dependency") {
  docker.image('shippingdocker/php-composer:7.4').inside() {
   sh 'composer install --no-interaction --prefer-dist'
  }
 }

 stage("Test") {
  docker.image('ubuntu').inside() {
   sh 'echo "Ini adalah test"'
  }
 }

}