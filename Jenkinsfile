node {

    stage("Checkout") {
        checkout scm
    }

    stage("Install Dependency") {
        docker.image('shippingdocker/php-composer:8.2').inside() {
            sh 'composer install --no-interaction --prefer-dist'
        }
    }

    stage("Test") {
        docker.image('ubuntu').inside() {
            sh 'echo "Ini adalah test"'
        }
    }

}