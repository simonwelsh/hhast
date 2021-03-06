<?hh // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<151eb671bb79e6d60adfb4f96c97cb37>>
 */
namespace Facebook\HHAST\__Private;
use namespace Facebook\HHAST;

function editable_trivia_from_json(
  dict<string, mixed> $json,
  int $position,
  string $source,
): HHAST\EditableTrivia {
  $trivia_text = substr($source, $position, $json['width']);
  switch ((string)$json['kind']) {
    case 'whitespace':
      return new HHAST\WhiteSpace($trivia_text);
    case 'end_of_line':
      return new HHAST\EndOfLine($trivia_text);
    case 'delimited_comment':
      return new HHAST\DelimitedComment($trivia_text);
    case 'single_line_comment':
      return new HHAST\SingleLineComment($trivia_text);
    case 'unsafe':
      return new HHAST\Unsafe($trivia_text);
    case 'unsafe_expression':
      return new HHAST\UnsafeExpression($trivia_text);
    case 'fix_me':
      return new HHAST\FixMe($trivia_text);
    case 'ignore_error':
      return new HHAST\IgnoreError($trivia_text);
    case 'fall_through':
      return new HHAST\FallThrough($trivia_text);
    default:
      throw new \Exception('unexpected JSON kind: '.(string)$json['kind']);
  }
}
