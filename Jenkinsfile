pipeline {
    agent any

    environment {
        EC2_USER = 'ubuntu'
        EC2_HOST = '54.167.13.212'
        DEPLOY_DIR = '/var/www/userservice' // Target directory on EC2
        SSH_KEY = credentials('f9dab4b3-a685-407a-b9ad-aa3a33f16523') // Add SSH key to Jenkins credentials
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

         steps {
            echo 'Deploying the application...'
            script {
                // Rsync or SCP commands to deploy to EC2
                sh """
                    rsync -avz --delete ./ ${ubuntu}@${54.167.13.212}:${/var/www/userservice}/
                """
            }
        }
    }
}