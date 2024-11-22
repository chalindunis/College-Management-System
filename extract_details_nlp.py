# import spacy

# nlp = spacy.load("en_core_web_sm")
# doc = nlp('uploads\documents\Sample_Personal_information.pdf')

# for ent in doc.ents:
#     print(f"{ent.text}: {ent.label_}")



import spacy
from pypdf import PdfReader

# Load spaCy model
nlp = spacy.load("en_core_web_sm")

# Path to the PDF file
pdf_path = r'uploads\documents\Sample_Personal_information.pdf'

# Extract text from the PDF
reader = PdfReader(pdf_path)
text = ""
for page in reader.pages:
    text += page.extract_text()

# Process the extracted text with spaCy
doc = nlp(text)

# Print named entities
for ent in doc.ents:
    print(f"{ent.text}: {ent.label_}")
