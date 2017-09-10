<?hh
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<19d7116bacc120c439767bf2ba73c1bd>>
 */
namespace Facebook\HHAST;
use type Facebook\TypeAssert\TypeAssert;

final class StaticDeclarator extends EditableSyntax {

  private EditableSyntax $_name;
  private EditableSyntax $_initializer;

  public function __construct(
    EditableSyntax $name,
    EditableSyntax $initializer,
  ) {
    parent::__construct('static_declarator');
    $this->_name = $name;
    $this->_initializer = $initializer;
  }

  public static function from_json(
    array<string, mixed> $json,
    int $position,
    string $source,
  ): this {
    $name = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['static_name'],
      $position,
      $source,
    );
    $position += $name->width();
    $initializer = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['static_initializer'],
      $position,
      $source,
    );
    $position += $initializer->width();
    return new self($name, $initializer);
  }

  public function children(): KeyedTraversable<string, EditableSyntax> {
    yield 'name' => $this->_name;
    yield 'initializer' => $this->_initializer;
  }

  public function rewrite_children(
    self::TRewriter $rewriter,
    ?Traversable<EditableSyntax> $parents = null,
  ): this {
    $parents = $parents === null ? vec[] : vec($parents);
    $parents[] = $this;
    $name = $this->_name->rewrite($rewriter, $parents);
    $initializer = $this->_initializer->rewrite($rewriter, $parents);
    if (
      $name === $this->_name &&
      $initializer === $this->_initializer
    ) {
      return $this;
    }
    return new self($name, $initializer);
  }

  public function name(): ?VariableToken {
    return $this->_name->is_missing() ? null : TypeAssert::isInstanceOf(VariableToken::class, $this->_name);
  }

  public function namex(): VariableToken {
    return TypeAssert::isInstanceOf(VariableToken::class, $this->_name);
  }

  public function raw_name(): EditableSyntax {
    return $this->_name;
  }

  public function with_name(EditableSyntax $value): this {
    return new self($value, $this->_initializer);
  }

  public function initializer(): ?SimpleInitializer {
    return $this->_initializer->is_missing() ? null : TypeAssert::isInstanceOf(SimpleInitializer::class, $this->_initializer);
  }

  public function initializerx(): SimpleInitializer {
    return TypeAssert::isInstanceOf(SimpleInitializer::class, $this->_initializer);
  }

  public function raw_initializer(): EditableSyntax {
    return $this->_initializer;
  }

  public function with_initializer(EditableSyntax $value): this {
    return new self($this->_name, $value);
  }
}