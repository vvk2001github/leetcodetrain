class ListNode:
	def __init__(self, x):
		self.val = x
		self.next = None

class Solution:
	def addTwoNumbers(self, l1: ListNode, l2: ListNode) -> ListNode:
		p = l1
		q = l2
		carry = 0
		res = ListNode(0)
		res_tail = res
		while p or q or (carry > 0):
			x = p.val if p else 0
			y = q.val if q else 0
			print('x = ', x)
			print('y = ', y) 
			sum = carry + x + y
			#res_tail.val = sum % 10
			carry = sum // 10
			res_tail.next = ListNode(sum % 10)
			p = p.next if p else None
			q = q.next if q else None
			print('p = ', p)
			print('q = ', q)
			print('carry = ', carry)
			res_tail = res_tail.next
		print(carry)
		if carry>0:
			res_tail.next = ListNode(carry)
		print(res.val, '->', res.next.val, '->', res.next.next.val)
		return res.next

l1 = ListNode(2)
l1.next = ListNode(4)
l1.next.next = ListNode(3)
#print(l1.val, '->', l1.next.val, '->', l1.next.next.val)

l2 = ListNode(5)
l2.next = ListNode(6)
l2.next.next = ListNode(6)

s = Solution()
r = s.addTwoNumbers(l1, l2)
while r:
	print(r.val)
	r = r.next