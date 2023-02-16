import { Injectable } from '@angular/core';
import { Apollo } from 'apollo-angular';
import { Observable } from 'rxjs';
import { ExportPdfReportQuery } from '../queries/export-pdf-report.query';
import { ExportParams } from '../interfaces/export-params.interface';

@Injectable()
export class ExportService {

  constructor(private apollo: Apollo) { }

  /**
   * Export a report to PDF
   * @param ExportParams params
   */
  exportToPdf(params: ExportParams): Observable<any> {
    return this.apollo.watchQuery({
      query: ExportPdfReportQuery,
      variables: {
        type: params.reportType,
        uniqueId: params.uniqueId,
        lexId: Number(params.lexid),
        reportDate: params.reportDate,
        historyId: Number(params.historyId),
        prQuery: params.prQuery ? params.prQuery : null,
        prFormat: params.prFormat ? params.prFormat : null
      },
    }).valueChanges;
  }

  /**
   * Generates a blob with the given type by converting the base64 string
   * a byte array
   * @param string b64Data
   * @param string contentType
   * @param number sliceSize
   */
  b64toBlob(b64Data: string, contentType = '', sliceSize = 512): Blob {
    const byteCharacters = atob(b64Data);
    const byteArrays = [];

    for (let offset = 0; offset < byteCharacters.length; offset += sliceSize) {
      const slice = byteCharacters.slice(offset, offset + sliceSize);

      const byteNumbers = new Array(slice.length);
      for (let i = 0; i < slice.length; i++) {
        byteNumbers[i] = slice.charCodeAt(i);
      }

      const byteArray = new Uint8Array(byteNumbers);
      byteArrays.push(byteArray);
    }

    const blob = new Blob(byteArrays, {type: contentType});
    return blob;
  }

  /**
   * Opens the report PDF
   * @param any data Object with report name and data
   */
  openPdfFile(data: any) {
    const blob = this.b64toBlob(data.report, 'application/pdf');
    const downloadUrl = window.URL.createObjectURL(blob);
    this.createDownloadLink(downloadUrl, data.filename);
  }

  /**
   * Creates a dynamic link and append it to the body to trigger
   * donwload event in the browser
   * @param string href
   * @param string filename
   */
  private createDownloadLink(href: string, filename: string) {
    const downloadLink = document.createElement('a');
    downloadLink.download = filename;
    downloadLink.href = href;
    document.body.appendChild(downloadLink);
    downloadLink.click();
    document.body.removeChild(downloadLink);
    window.URL.revokeObjectURL(href);
  }
}
