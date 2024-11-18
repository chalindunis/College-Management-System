import logging
import sys
import os
from pypdf import PdfReader, PdfWriter

logging.basicConfig(filename='pdf_splitter.log', level=logging.DEBUG, 
                    format='%(asctime)s - %(levelname)s - %(message)s')


def split_pdf_by_sections(input_path, output_folder, section_names):
  """
  Splits a PDF into separate PDFs based on the given section names.

  Args:
    pdf_path: The path to the PDF file.
    section_names: A list of section names to split the PDF by.
  """
  with open(input_path, 'rb') as file:
    reader = PdfReader(file)
    writers = {name: PdfWriter() for name in section_names}
    current_section = None
    for i in range(len(reader.pages)):
      page = reader.pages[i]
      text = page.extract_text()
      for section_name in section_names:
          if section_name in text:
              current_section = section_name
              break
      if current_section:
        writers[current_section].add_page(page)

    for section_name, writer in writers.items():
      output_filename = os.path.join(output_folder, f'{section_name}.pdf')
      with open(output_filename, "wb") as fp:
        writer.write(fp) #save the created/modified PDF to a file.
    logging.debug('Script started')

if __name__ == "__main__":
    print('hello')
    if len(sys.argv) != 3:
        print("Usage: python Pdf_splitter.py <input_pdf_path> <output_folder>")
        sys.exit(1)

    input_path = sys.argv[1]
    logging.info(f'Input path: {input_path}')
    output_folder = sys.argv[2]
    section_names = ['Introduction to Training Establishment', 'Projects', 'Conclusion']
    # split_pdf_by_sections('Training.pdf', section_names)

    split_pdf_by_sections(input_path, output_folder, section_names)
    print(f"PDF split successfully. Output folder: {output_folder}")

    
    
    logging.info(f'Output folder: {output_folder}')
