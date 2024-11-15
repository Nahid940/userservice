pipeline {
    agent any

    environment {
        EC2_USER = 'ubuntu'
        EC2_HOST = '54.167.13.212'
        DEPLOY_DIR = '/var/www/userservice' // Target directory on EC2
        SSH_KEY = credentials('MyAwsKey') // Add SSH key to Jenkins credentials
    }

    stages {
        stage('Build') {
            steps {
                echo 'Building the project...'
                // Add build commands here (e.g., npm install, mvn build)
            }
        }

        stage('Test') {
            steps {
                echo 'Running tests...'
                // Add test commands here (e.g., npm test, phpunit)
            }
        }

        stage('Deploy') {
            steps {
                echo 'Deploying the application...'
                // Add deployment commands here (e.g., rsync, kubectl)
            }
        }
    }
}