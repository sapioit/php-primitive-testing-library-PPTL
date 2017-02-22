# php-primitive-testing-library-PPTL

## example:
```php
test('htmlspecialchars',
'32--&#039;&quot;&lt;zzz&gt;',
'["32--\'\"<zzz>","aaa"]');

test('htmlspecialchars',
'{&quot;0&quot; : &quot;32--&#039;\&quot;&quot;,&quot;1&quot; : &quot;aaa&quot;}',
'{"0" : "32--\'\"","1" : "aaa"}');

test('htmlspecialchars',
'32--&#039;&quot;&lt;zzz&gt;',
<<<'QUOTE'
32--'"<zzz>
QUOTE
);

test('htmlspecialchars',
'{&quot;0&quot; : &quot;32--&#039;\&quot;&quot;,&quot;1&quot; : &quot;aaa&quot;}',
<<<'QUOTE'
{"0" : "32--'\"","1" : "aaa"}
QUOTE
);
```
