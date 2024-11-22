import sys
import json
import pytesseract
from pdf2image import convert_from_path
import re

# Set the path to the Tesseract executable
pytesseract.pytesseract.tesseract_cmd = r'C:\Program Files\Tesseract-OCR\tesseract.exe'

def extract_info(file_path):
    info = {
        'studentname': '',
        'email': '',
        'gender': '',
        'course': ''
    }

    # Convert PDF to images
    images = convert_from_path(file_path, poppler_path = r'C:\poppler-24.07.0\Library\bin')

    # Extract text from all pages
    text = ''
    for image in images:
        text += pytesseract.image_to_string(image)

    # Extract information using regex
    name_match = re.search(r'Name:\s*(.+)', text)
    if name_match:
        info['studentname'] = name_match.group(1).strip()

    email_match = re.search(r'Email:\s*(\S+@\S+)', text)
    if email_match:
        info['email'] = email_match.group(1).strip()

    gender_match = re.search(r'Gender:\s*(Male|Female|Other)', text, re.IGNORECASE)
    if gender_match:
        info['gender'] = gender_match.group(1).capitalize()

    course_match = re.search(r'Course:\s*(.+)', text)
    if course_match:
        info['course'] = course_match.group(1).strip()

    return json.dumps(info)

# if __name__ == "__main__":
#     # file_path =/ 'D:\xampp\htdocs\College-Management-System\uploads\documents\Training_Report_190005E (1).pdf'
#     extract_info('D:\xampp\htdocs\College-Management-System\uploads\documents\Training_Report_190005E (1).pdf')
#     if len(sys.argv) > 1:
#         file_path = sys.argv[1]
#         print(extract_info(file_path))
#     else:
#         print(json.dumps({'error': 'No file path provided'}))


file_path ='uploads\documents\Sample_Personal_information.pdf'
print(extract_info(file_path))