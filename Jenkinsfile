node {

    stage('Checkout') {
        checkout scm
    }

    stage('Install Dependency') {
        docker.image('composer:2').inside() {
            sh '''
                composer install \
                --no-interaction \
                --prefer-dist \
                --no-progress
            '''
        }
    }

    stage('Test') {
        sh 'echo "Ini adalah test"'
    }

}