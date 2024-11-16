pipeline {
    agent any

    environment {
        WORKSPACE_DIR = "/var/lib/jenkins/workspace/userservice" // Jenkins workspace directory
        PROJECT_DIR = "/var/www/userservice" // Laravel project directory
    }

    stages {
        stage('Checkout Code') {
            steps {
                // Pull code from GitHub
                git branch: 'main', url: 'https://github.com/Nahid940/userservice.git'
            }
        }

        stage('Deploy to EC2 Folder') {
            steps {
                // Sync files from Jenkins workspace to the Laravel project folder
                sh """
                rsync -avz --no-times --no-group --no-perms --delete \
                    --exclude='.git' \
                    --exclude='storage/logs' \
                    --exclude='.env' \
                    /var/lib/jenkins/workspace/userservice/ /var/www/userservice/
                """
            }
        }
        
        // stage('Install Dependencies') {
        //     steps {
        //         // Ensure dependencies are installed
        //         sh 'composer install --no-dev --optimize-autoloader'
        //     }
        // }
        
        stage('Run Migrations') {
            steps {
                // Run Laravel migrations
                sh 'php artisan migrate --force'
            }
        }

        stage('Clear Cache and Config') {
            steps {
                // Clear and cache config
                sh 'php artisan config:clear'
                sh 'php artisan config:cache'
                sh 'php artisan route:clear'
                sh 'php artisan route:cache'
            }
        }

    }

    post {
        success {
            echo 'Deployment successful!'
        }
        failure {
            echo 'Deployment failed. Check the logs for more details.'
        }
    }
}