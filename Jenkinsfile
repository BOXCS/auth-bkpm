node {
    checkout scm


    stage('Build') {
        docker.image('composer:latest').inside('--network jenkins -u root') {
            sh 'rm -f composer.lock'
            sh 'composer install --ignore-platform-reqs'
        }
    }


    stage('Test') {
        docker.image('ubuntu').inside('--network jenkins -u root') {
            sh 'echo "Running tests..."'
            // sh 'php artisan test'
        }
    }


    stage('Deploy') {
        docker.image('agung3wi/alpine-rsync:1.1').inside('--network jenkins -u root') {
            sshagent(credentials: ['ssh-prod']) {
                sh 'mkdir -p ~/.ssh'
                sh 'ssh-keyscan -H "$PROD_HOST" > ~/.ssh/known_hosts'
                sh """rsync -rav --delete ./ \\
                    ubuntu@\$PROD_HOST:/home/ubuntu/prod.kelasdevops.xyz/ \\
                    --exclude=.env --exclude=storage --exclude=.git"""
            }
        }
    }
}
