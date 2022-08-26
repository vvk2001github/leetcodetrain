class Solution:

	def lengthOfLongestSubstring(self, s: str) -> int:
		tmp=[]
		res = 0

		for x in s:
			if x in tmp:
				tmp = tmp[tmp.index(x)+1:]
				print('!!!   ', tmp)

			tmp.append(x)
			print(tmp)
			res = max(res, len(tmp))

		return res

if __name__ == '__main__':
	sol = Solution()
	string = 'abcabcbb'
	res = sol.lengthOfLongestSubstring(string)
	print(res)
