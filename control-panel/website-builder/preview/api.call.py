import os
import subprocess

# Change to the desired directory where your PHP files are located
os.chdir(r"C:\xampp\htdocs\online-store.varsitymarket.package\website-builder\preview\docs")

# Command to start the PHP built-in server
command = [
    r"C:\xampp\php\php.exe",  # Replace with the path to your PHP executable
    "-S",
    "127.0.0.1:8000"  # Change the port if needed
]

# Open a log file to capture the output
with open("session.log.hash.report.pxy", "w") as log_file:
    subprocess.run(command, stdout=log_file, stderr=subprocess.STDOUT)