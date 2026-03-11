node {

    stage('Checkout') {
        checkout scm
    }

    stage('Install Dependency') {
        docker.image('composer:2.7').inside() {
            sh '''
                composer install \
                --no-interaction \
                --prefer-dist \
                --no-progress
            '''
        }
    }

    stage('Test') {
        sh 'echo "Running tests..."'
    }

}